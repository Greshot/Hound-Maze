<?php

class BFS
{

    private $matrix;
    private $root;
    private $goal;
    private $checked = array();
    private $queue = array();
    private $previous = array();
    private $allowedValue;


    /**
     * Creates a new BFS class instance
     *
     * @param array $matrix
     * @param array $root
     * @param array $goal
     * @param string $allowedValue
     * @return void
     */
    public function __construct($matrix, $root, $goal, $allowedValue)
    {
        $this->matrix = $matrix;
        $this->root = $root;
        $this->goal = $goal;
        $this->allowedValue = $allowedValue;
        $this->checkNodes();
    }


    /**
     * Checks Root and Goal Node before doing anything else
     *
     * return void
     * @throws Exception
     */
    private function checkNodes()
    {
        if (!isset($this->matrix[$this->root[0]][$this->root[1]])) {
            throw new Exception("Root coordinate does not exist in the maze!");
        }

        if (!isset($this->matrix[$this->goal[0]][$this->goal[1]])) {
            throw new Exception("Goal coordinate does not exist in the maze!");
        }

        if ($this->matrix[$this->root[0]][$this->root[1]] != $this->allowedValue) {
            throw new Exception("Root coordinate must have {$this->allowedValue} as value");
        }

        if ($this->matrix[$this->goal[0]][$this->goal[1]] != $this->allowedValue) {
            throw new Exception("Goal coordinate must have {$this->allowedValue} as value");
        }
    }

    /**
     * Finds path from root node to goal node and returns an array containing the full path from root to goal or a
     * string in case it is not found
     *
     * @return array|string
     */
    public function findPath()
    {
        $this->queue [] = [$this->root[0], $this->root[1]];

        //(right, left, down, up) coordinate increase for finding adjacent nodes
        $xIncrease = [0, 0, 1, -1];
        $yIncrease = [1, -1, 0, 0];

        $this->previous [$this->root[0]] [$this->root[1]] = null;
        $this->checked[$this->root[0]][$this->root[1]] = true;

        while (count($this->queue) > 0) {
            $current = array_shift($this->queue);

            if ($current[0] == $this->goal[0] && $current[1] == $this->goal[1]) {
                break;
            }

            //Find adjacent Nodes
            for ($i = 0; $i < 4; $i++) {
                $adjacentx = $xIncrease[$i] + $current[0];
                $adjacentY = $yIncrease[$i] + $current[1];

                if ($this->checkAdjacentNode($adjacentx, $adjacentY)) {
                    $this->previous [$adjacentx] [$adjacentY] = $current;
                    $this->queue [] = [$adjacentx, $adjacentY];
                    $this->checked[$adjacentx][$adjacentY] = true; //Marco como visitado dicho estado para no volver a recorrerlo
                }
            }
        }

        return $this->buildPath();

    }


    /**
     * Checks whether the adjacent node has valid coordinates within the matrix, a valid value for being considered in
     * the path to the goal node and that it must not be checked before
     *
     * @param int $x
     * @param int $y
     * @return bool
     */
    private function checkAdjacentNode($x, $y)
    {
        return $x >= 0 && $y >= 0 && isset($this->matrix[$x][$y]) &&
            $this->matrix[$x][$y] == $this->allowedValue && !isset($this->checked[$x][$y]);

    }


    /**
     * Returns the array containing the full path from root to goal or a string in case it is not found
     *
     * @return array|string
     */
    private function buildPath()
    {
        $path = array();
        $ref = $this->goal;

        if (!isset($this->previous[$ref[0]][$ref[1]])) {
            return "Could not find the prey!";
        }
        $path [] = "[{$ref[0]}, {$ref[1]}]";
        while ($this->previous[$ref[0]][$ref[1]] != null) {
            $ref = $this->previous[$ref[0]][$ref[1]];
            $path [] = "[{$ref[0]}, {$ref[1]}]";
        }


        return $path;
    }
}