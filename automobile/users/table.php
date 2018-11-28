<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style>
table {
    width: 100%;
    border-spacing: 0;
}

thead, tbody, tr, th, td { display: block; }



tr:after {  /* clearing float */
    content: ' ';
    display: block;
    visibility: hidden;
    clear: both;
}

tbody {
    height: 50px;
    overflow-y: auto;
    overflow-x: hidden;
}

tbody td, thead th {
    width: 19%;  /* 19% is less than (100% / 5 cols) = 20% */
    float: left;
}
</style>
</head>

<body>
<table border="1">
<thead>
<tr>
    <th>Head 1</th>
    <th>Head 2</th>
    <th>Head 3</th>
    <th>Head 4</th>
    <th>Head 5</th>
</tr>
</thead>
<tbody>
<tr>
    <td>Content 1</td>
    <td>Content 2</td>
    <td>Content 3</td>
    <td>Content 4</td>
    <td>Content 5</td>
</tr>
<tr>
    <td>Content 1</td>
    <td>Content 2</td>
    <td>Content 3</td>
    <td>Content 4</td>
    <td>Content 5</td>
</tr>
<tr>
    <td>Content 1</td>
    <td>Content 2</td>
    <td>Content 3</td>
    <td>Content 4</td>
    <td>Content 5</td>
</tr>
<tr>
    <td>Content 1</td>
    <td>Content 2</td>
    <td>Content 3</td>
    <td>Content 4</td>
    <td>Content 5</td>
</tr>
</tbody>
</table>
</body>
</html>
