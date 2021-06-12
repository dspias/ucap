<?php

namespace App\Helpers;

use App\Models\Program;
use App\Models\ProgramSession;

class Cart
{
    public function __construct()
    {
        if($this->get() === null)
            $this->set($this->empty());
    }

    public function add(Program $program, ProgramSession $session): void
    {
        $cart = $this->get();
        $count = count($cart['programs']);
        $limit = ucap_get('cart_limit') ?? 3;
        if(!$this->match($program->id) && $count < $limit){
            $data = array(
                'program' => $program->id,
                'session' => $session->id,
            );
            array_push($cart['programs'], $data);
            $this->set($cart);
        }
    }

    public function match($id): int
    {
        $cart = $this->get();
        if ($cart === null) return false;
        $programs = (array) $cart['programs'];
        foreach($programs as  $item){
            if($item['program'] == $id) return true;
        }
        return false;
    }

    public function remove(int $programId): void
    {
        $cart = $this->get();
        array_splice($cart['programs'], array_search($programId, array_column($cart['programs'], 'program')), 1);
        $this->set($cart);
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
        return request()->session()->get('cart');
    }

    private function set($cart): void
    {
        request()->session()->put('cart', $cart);
    }

    public function getProgram($programId)
    {
        return Program::find($programId);
    }

    public function getSession($sessionId)
    {
        return ProgramSession::find($sessionId);
    }
}
