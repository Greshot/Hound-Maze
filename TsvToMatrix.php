<?php

class TsvToMatrix
{

    private $TsvFilePath;
    private $matrix = array();

    /**
     * Creates a new TsvToMatrix class instance
     *
     * @param string $TsvFilePath
     * @return void
     */
    public function __construct($TsvFilePath)
    {
        $this->TsvFilePath = $TsvFilePath;
    }

    /**
     * Creates a Matrix from the TSV file content and returns it.
     * Throws an Exception when a wrong path to the TSV file is given
     *
     * @return array
     * @throws Exception
     */
    public function buildMatrix()
    {
        if (!is_file($this->TsvFilePath)) {
            throw new Exception("Wrong path to TSV file");
        }

        $rows = file($this->TsvFilePath);

        for ($i = 5; $i < count($rows); $i++) {
            $columns = str_getcsv($rows[$i], "\t");
            for ($j = 5; $j < count($columns); $j++) {
                $this->matrix [$i - 5] [$j - 5] = $columns[$j];
            }
        }

        return $this->matrix;
    }

}