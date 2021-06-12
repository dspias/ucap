<?php

namespace App\Helpers;

use App\Models\Program;

class Compare
{
    public function __construct()
    {
        if($this->get() === null)
            $this->set($this->empty());
    }

    public function add(program $program): void
    {
        $compare = $this->get();
        if(!$this->match($program->id)){
            array_push($compare['programs'], $program);
            $this->set($compare);
        }
    }

    public function match($id): int
    {
        $compare = $this->get();
        if ($compare === null) return false;
        $programs = (array) $compare['programs'];
        foreach($programs as  $item){
            if($item->id == $id) return true;
        }
        return false;
    }

    public function remove(int $programId): void
    {
        $compare = $this->get();
        array_splice($compare['programs'], array_search($programId, array_column($compare['programs'], 'id')), 1);
        $this->set($compare);
    }

    public function clear(): void
    {
        $this->set($this->empty());
    }

    public function empty(): array
    {
        return [
            'programs' => [],
        ];
    }

    public function get(): ?array
    {
        return request()->session()->get('compare');
    }

    private function set($compare): void
    {
        request()->session()->put('compare', $compare);
    }
}
