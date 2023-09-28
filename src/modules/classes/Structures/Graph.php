<?php

namespace Module\Structures;

class Graph
{
    protected array $vertices;
    protected array $edges;

    public function __construct(array $vertices = [], array $edges = [])
    {
        $this->edges = $vertices;
        $this->vertices = $vertices;
    }

    public function addVertex(int $vertex, int $value)
    {
        if (!$this->hasVertex($vertex)) {
            $this->vertices[$vertex] = $value;
        }
    }

    public function addEdge(int $vertex1, int $vertex2)
    {
        $is_already_not_exist = !$this->hasEdge($vertex1, $vertex2);
        $is_verteces_exist = $this->hasVertex($vertex1) && $this->hasVertex($vertex2);
        if ($is_already_not_exist && $is_verteces_exist) {
            $this->edges[] = array('vertex1' => $vertex1, 'vertex2' => $vertex2);
        }
    }

    public function removeEdge(int $vertex1, int $vertex2)
    {
        foreach ($this->edges as $key => $value) {
            if (
                ($value['vertex1'] === $vertex1 && $value['vertex2'] === $vertex2) ||
                ($value['vertex1'] === $vertex2 && $value['vertex2'] === $vertex1)
            ) {
                unset($this->edges[$key]);
            }
        }
    }

    public function removeVertex(int $vertex)
    {
        if ($this->hasVertex($vertex)) {
            unset($this->vertices[$vertex]);
            foreach ($this->edges as $key => $value) {
                if ($value['vertex1'] === $vertex || $value['vertex2'] === $vertex) {
                    unset($this->edges[$key]);
                }
            }
        }
    }

    public function getVertices()
    {
        return $this->vertices;
    }

    public function getEdges()
    {
        return $this->edges;
    }

    public function hasVertex(int $vertex)
    {
        return array_key_exists($vertex, $this->vertices);
    }

    public function hasEdge(int $vertex1, int $vertex2): bool
    {
        foreach ($this->edges as $key => $value) {
            if (
                ($value['vertex1'] === $vertex1 && $value['vertex2'] === $vertex2) ||
                ($value['vertex1'] === $vertex2 && $value['vertex2'] === $vertex1)
            ) {
                return true;
            }
        }
        return false;
    }

    public function setVertexValue(int $vertex, mixed $value): void
    {
        if ($this->hasVertex($vertex))
            $this->vertices[$vertex] = $value;
    }

    public function getVertexValue(int $vertex): mixed
    {
        return $this->vertices[$vertex] ?? null;
    }

    public function getAdjacentVertices(int $vertex)
    {
        $vertices = [];
        foreach ($this->edges as $key => $value) {
            if ($value['vertex1'] === $vertex) {
                $vertices[] = $value['vertex2'];
            } elseif ($value['vertex2'] === $vertex) {
                $vertices[] = $value['vertex1'];
            }
        }
        return $vertices;
    }
}