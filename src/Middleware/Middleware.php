<?php

namespace App\Middleware;

use App\Traits\AuthorAndAdmin;
use App\Traits\IsAdmin;
use App\Traits\IsAuthor;



class Middleware
{

    use IsAuthor;
    use IsAdmin;
    use AuthorAndAdmin;


    public function resolve($middlware)
    {
        if ($middlware === null) {
            return;
        }

        if (method_exists($this, $middlware)) {
            $this->$middlware("d");
        } else {
            throw new \Exception('No matching middleware fond for key ' . $middlware);
        }
    }
}
