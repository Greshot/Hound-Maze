<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/main.css">
    <title>Code Hunt</title>
</head>
<body>

<section class="code-hunt">
    <h1> Code Hunt : Hound Maze</h1>
    <?php
    if (!is_array($pathCodeHunt)) {
        echo $pathCodeHunt;
    } else {
        echo "<pre>";
        foreach ($matrixCodeHunt as $rowKey => $row) {
            $line = "";
            foreach ($row as $columnKey => $column) {
                if (array_search("[{$rowKey}, {$columnKey}]", $pathCodeHunt) !== false) {
                    if ($rowKey == $nodesCodeHunt["goal"][0] && $columnKey == $nodesCodeHunt["goal"][1]) {
                        $line .= "<span class='goal'>" . $column . "</span>\t";
                    } elseif ($rowKey == $nodesCodeHunt["root"][0] && $columnKey == $nodesCodeHunt["root"][1]) {
                        $line .= "<span class='root'>" . $column . "</span>\t";
                    } else {
                        $line .= "<span class='path-node'>" . $column . "</span>\t";
                    }
                } else {
                    $line .= $column . "\t";
                }
            }
            echo $line . "<br />";
        }
        echo "</pre>";

        $stringPath = array();

        foreach (array_reverse($pathCodeHunt, true) as $step) {
            $stringPath [] = $step;
        }
        $stringPath = "[" . join(",", $stringPath) . "]";

        echo "{$stringPath}";
    }
    ?>
</section>
<section class="sample-1">
    <h1> Code Hunt : Sample 1</h1>
    <?php
    if (!is_array($pathSample1)) {
        echo $pathSample1;
    } else {
        echo "<pre>";
        foreach ($matrixSample1 as $rowKey => $row) {
            $line = "";
            foreach ($row as $columnKey => $column) {
                if (array_search("[{$rowKey}, {$columnKey}]", $pathSample1) !== false) {
                    if ($rowKey == $nodesSample1["goal"][0] && $columnKey == $nodesSample1["goal"][1]) {
                        $line .= "<span class='goal'>" . $column . "</span>\t";
                    } elseif ($rowKey == $nodesSample1["root"][0] && $columnKey == $nodesSample1["root"][1]) {
                        $line .= "<span class='root'>" . $column . "</span>\t";
                    } else {
                        $line .= "<span class='path-node'>" . $column . "</span>\t";
                    }
                } else {
                    $line .= $column . "\t";
                }
            }
            echo $line . "<br />";
        }
        echo "</pre>";

        $stringPath = array();

        foreach (array_reverse($pathSample1, true) as $step) {
            $stringPath [] = $step;
        }
        $stringPath = "[" . join(",", $stringPath) . "]";

        echo "{$stringPath}";
    }
    ?>
</section>
<section class="sample-2">
    <h1> Code Hunt : Sample 2</h1>
    <?php
    if (!is_array($pathSample2)) {
        echo $pathSample2;
    } else {
        echo "<pre>";
        foreach ($matrixSample2 as $rowKey => $row) {
            $line = "";
            foreach ($row as $columnKey => $column) {
                if (array_search("[{$rowKey}, {$columnKey}]", $pathSample2) !== false) {
                    if ($rowKey == $nodesSample2["goal"][0] && $columnKey == $nodesSample2["goal"][1]) {
                        $line .= "<span class='goal'>" . $column . "</span>\t";
                    } elseif ($rowKey == $nodesSample2["root"][0] && $columnKey == $nodesSample2["root"][1]) {
                        $line .= "<span class='root'>" . $column . "</span>\t";
                    } else {
                        $line .= "<span class='path-node'>" . $column . "</span>\t";
                    }
                } else {
                    $line .= $column . "\t";
                }
            }
            echo $line . "<br />";
        }
        echo "</pre>";

        $stringPath = array();

        foreach (array_reverse($pathSample2, true) as $step) {
            $stringPath [] = $step;
        }
        $stringPath = "[" . join(",", $stringPath) . "]";

        echo "{$stringPath}";
    }
    ?>
</section>

</body>
</html>
