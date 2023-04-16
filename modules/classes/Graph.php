<?php

    namespace Structures;

    class Graph {
        private array $graphs;
        protected int $size;

        public function __construct(int $size) {
            for ($i = 1; $i <= $size; $i++) {
                $this->graphs[$i] = [];
            }
        }

        public function set(int $id, array $ribs): bool {
            if (!key_exists($id, $this->graphs)) {
                return false;
            }

            $this->graphs[$id] = $ribs;
            return true;
        }

        public function get(int $id): array {
            return $this->graphs[$id] ?? [];
        }

        public function get_graphs(): array {
            return $this->graphs;
        }
    }