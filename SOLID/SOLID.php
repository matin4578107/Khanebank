<?php

interface HummanI {
    public function Smell();
}

interface ProgramerI {
    public function do_code();
}

interface TesterI {
    public function test();
}

interface ManegerI {
    public function manege();
}

interface WorkerI {
    public function work();
}

interface SecreterI {
    public function secret();
}

class Humman {
    public function smell() {
        echo("Smelling</br>");
    }
}

class Programer extends Humman implements ProgramerI, TesterI, WorkerI {
    public function do_code() {
        return "Coding";
    }

    public function test() {
        return "Testing";
    }

    public function work() {
        echo($this->do_code() . "</br>");
        echo($this->test() . "</br>");
    }
}

class Tester extends Humman implements TesterI, WorkerI {
    public function test() {
        return "Testing";
    }

    public function work() {
        echo($this->test() . "</br>");
    }
}

class Maneger extends Humman implements ManegerI, TesterI, WorkerI {
    public function manege() {
        return "Maneging";
    }

    public function test() {
        return "Testing";
    }

    public function work() {
        echo($this->manege() . "</br>");
        echo($this->test() . "</br>");
    }
}

class Secreter extends Humman implements SecreterI, WorkerI {
    public function secret() {
        return "Secreting";
    }

    public function work() {
        echo($this->secret() . "</br>");
    }
}

class Work {
    public function __construct(public WorkerI $Worker) {

    }

    public function do() {
        $this->Worker->work();
        $this->Worker->smell();
    }
}

$work1 = new work(new Programer());
$work1->do();

$work2 = new work(new Tester());
$work2->do();

$work3 = new work(new Maneger());
$work3->do();

$work4 = new work(new Secreter());
$work4->do();

?>