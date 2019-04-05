<?php
/* @var $this yii\web\View */
?>
<h1>movie/index</h1>

<table>
  <tr>
    <th>Id</th>
    <th>Name</th>
    <th>Category</th>
    <th>Director</th>
    <th>Content</th>
  </tr>
  <?php foreach($moviedata as $movie) :?>
  <tr>
  	<th><?php echo $movie->id ?></th>
  	<th><?php echo $movie->name ?></th>
  	<th><?php echo $movie->category_id ?></th>
  	<th><?php echo $movie->director_id ?></th>
  	<th><?php echo $movie->content ?></th>
  </tr>
  <?php endforeach?>
</table>

<style>
	table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>