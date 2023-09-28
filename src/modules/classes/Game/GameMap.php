<?php
namespace Module\Game;

use Module\Exception;
use Module\Structures\Graph;
use Module\Core\Session;
use Module\Cache\Cache;

final class GameMap
{
    private $size;
    private $difficult;
    private $game_map;
    private $size_step;

    public function __construct()
    {
        // todo Вынести получение стат из класса пользователя
        $this->size = Session::get('size');
        $this->size_step = (int) sqrt($this->size);
        $this->difficult = Session::get('difficult');
        $exsting_game_map = Session::get('game_map') ?: [];
        $exsting_game_map_edges = Session::get('game_map_edges') ?: [];
        if (!$exsting_game_map || !$exsting_game_map_edges) {
            $this->generate();
        } else {
            $this->game_map = new Graph($exsting_game_map, $exsting_game_map_edges);
        }
    }

    public function drawMap()
    {
        echo '<br>';
        echo '<br>';
        foreach ($this->game_map->getVertices() as $key => $value) {
            echo ($value === -1 ? 'X' : $value) . ' ';
            if ((($key + 1) % $this->size_step) === 0) {
                echo '<br>';
            }
        }
    }

    private function generate(): void
    {
        $this->setMap();
        $this->setMines();

        Session::set('game_map', $this->game_map->getVertices());
        Session::set('game_map_edges', $this->game_map->getEdges());
    }

    private function setMap(): void
    {
        $this->game_map = new Graph;
        for ($i = 0; $i < $this->size; $i++) {
            $this->game_map->addVertex($i, 0);
            $this->setEdgesFromMapVertex($i);
        }
    }

    private function setEdgesIfNotExist():void {
        Cache::get($this->size);

        for ($i = 0; $i < $this->size; $i++) {
            $this->setEdgesFromMapVertex($i);
        }

        Cache::set($this->size, $this->game_map->getEdges());
    }

    private function setMines(): void
    {
        $mines = [];
        for ($i = 0; $i < $this->difficult; ) {
            $mine = rand(0, $this->size - 1);
            if (in_array($mine, $mines)) {
                continue;
            }
            $mines[] = $mine;
            $this->game_map->setVertexValue($mine, -1);
            $this->increaseValueAroundMine($mine);
            $i++;
        }
    }

    private function increaseValueAroundMine(int $vertex): void
    {
        static $passed_vertex = [];
        $passed_vertex[] = $vertex;
        foreach ($this->game_map->getAdjacentVertices($vertex) as $item) {
            if (in_array($item, $passed_vertex)) {
                continue;
            }
            $value = $this->game_map->getVertexValue($item);
            if ($value >= 0) {
                $this->game_map->setVertexValue($item, $value + 1);
            }

        }
    }

    private function setEdgesFromMapVertex(int $vertex): void
    {
        if (($vertex % $this->size_step) !== 0) {
            $this->game_map->addEdge($vertex, $vertex - 1 - $this->size_step);
            $this->game_map->addEdge($vertex, $vertex - 1);
        }
        if ((($vertex + 1) % $this->size_step) !== 0) {
            $this->game_map->addEdge($vertex, $vertex + 1 - $this->size_step);
        }
        $this->game_map->addEdge($vertex, $vertex - $this->size_step);
    }

}