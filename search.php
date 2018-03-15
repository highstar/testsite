<?php
/**
 * Created by IntelliJ IDEA.
 * User: wuyufeng
 * Date: 28/02/2018
 * Time: 8:48 PM
 */
require_once ('connectvars.php');

$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Grab the sort setting and search keywords from the URL using GET
$sort = $_GET['sort'];
$user_search = $_GET['usersearch'];

// Calculate pagination information
$cur_page = isset($_GET['page']) ? $_GET['page'] : 1;
$result_per_page = 5; // number of results per page
$skip = (($cur_page-1) * $result_per_page);

function build_query($user_search, $sort) {
    $search_query = "SELECT * FROM articals";

    // Extract the search keywords into an array
    $clean_search = str_replace(',', ' ', $user_search);
    $search_words = explode(' ', $clean_search);
    $final_search_words = array();
    if (count($search_words) > 0) {
        foreach ($search_words as $word) {
            if (!empty($word)) {
                $final_search_words[] =$word;
            }
        }
    }

    // Generate a WHERE clause using all of the search keywords
    $where_list = array();
    if (count($final_search_words) > 0) {
        foreach ($final_search_words as $word) {
            $where_list[] ="content LIKE '%$word%'";
        }
    }
    $where_clause = implode(' OR ', $where_list);

    // Add the keyword WHERE clause to the search query
    if (!empty($where_clause)) {
        $search_query .= " WHERE $where_clause";
    }

    // Sort the search query using the sort setting
    switch ($sort) {
        // Ascending by title
        case 1:
            $search_query .= " ORDER BY title";
            break;
        // Descending by title
        case 2:
            $search_query .= " ORDER BY title DESC";
            break;
        // Ascending by data posted (oldest first)
        case 3:
            $search_query .= " ORDER BY date_posted";
            break;
        // Descending by data posted  (newest first)
        case 4:
            $search_query .= " ORDER BY date_posted DESC";
            break;
        default:
            // No sort setting provided, so don't sort the query
    }
    return $search_query;
}

function generate_sort_links($user_search, $sort) {
    $sort_links = '';

    switch ($sort) {
        case 1:
            $sort_links .= '<td><a href = "' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search.
                '&sort=2">Title</a></td><td>Content</td>';
            $sort_links .= '<td><a href = "' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search.
                '&sort=3">Date Posted</a></td>';
        break;
        case 3:
            $sort_links .= '<td><a href = "' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search.
                '&sort=1">Title</a></td><td>Content</td>';
            $sort_links .= '<td><a href = "' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search.
                '&sort=4">Date Posted</a></td>';
        break;
        default:
            $sort_links .= '<td><a href = "' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search.
                '&sort=1">Title</a></td><td>Content</td>';
            $sort_links .= '<td><a href = "' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search.
                '&sort=3">Date Posted</a></td>';
    }

    return $sort_links;
}

// Query to get the total results
$query = build_query($user_search, $sort);
$result = mysqli_query($dbc, $query);
$total = mysqli_num_rows($result);
$num_pages = ceil($total / $result_per_page);

// Query again to get just the subset of results
$query = $query . " LIMIT $skip, $result_per_page";
$result = mysqli_query($dbc, $query);

echo '<table border="0" cellpadding="2">';

echo '<td>Title</td><td>Content</td><td>Date Posted</td>';

while ($row = mysqli_fetch_array($result)) {
    echo '<tr class="result">';
    echo '<td align="top" width="20%">' . $row['title'] . '</td>';
    echo '<td align="top" width="50%">' . substr($row['content'], 0, 100) . '...</td>';
    echo '<td align="top" width="20%">' . substr($row['date_posted'], 0, 10) . '</td>';
    echo '</tr>';
}
echo '</table>';
?>
