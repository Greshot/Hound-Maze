<?php

require_once "TsvToMatrix.php";
require_once "BFS.php";


$tsvtoGraphCodeHunt = new TsvToMatrix("tsvFiles/Hound Maze(tsv).txt");
$matrixCodeHunt = $tsvtoGraphCodeHunt->buildMatrix();
//$nodesCodeHunt = ["root" => [54, 77], "goal" => [12, 20]];
$nodesCodeHunt = ["root" => [77, 54], "goal" => [20, 12]];
$bfsCodeHunt = new BFS($matrixCodeHunt, $nodesCodeHunt["root"], $nodesCodeHunt["goal"], "F");

// Find path to prey
$pathCodeHunt = $bfsCodeHunt->findPath();

$tsvtoGraphSample1 = new TsvToMatrix("tsvFiles/Sample1(tsv).txt");
$matrixSample1 = $tsvtoGraphSample1->buildMatrix();
//$nodesSample1 = ["root" => [25, 0], "goal" => [13, 11]];
$nodesSample1 = ["root" => [0, 25], "goal" => [11, 13]];
$bfsSample1 = new BFS($matrixSample1, $nodesSample1["root"], $nodesSample1["goal"], "F");
// Find path to prey
$pathSample1 = $bfsSample1->findPath();

$tsvtoGraphSample2 = new TsvToMatrix("tsvFiles/Sample2(tsv).txt");
$matrixSample2 = $tsvtoGraphSample2->buildMatrix();
//$nodesSample2 = ["root" => [25, 16], "goal" => [7, 5]];
$nodesSample2 = ["root" => [16, 25], "goal" => [5, 7]];
$bfsSample2 = new BFS($matrixSample2, $nodesSample2["root"], $nodesSample2["goal"], "F");
// Find path to prey
$pathSample2 = $bfsSample2->findPath();


require_once('views/result.php');