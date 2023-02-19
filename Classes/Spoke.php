<?php namespace Classes;

    use Traits\Run;
    use Traits\Walk;

    interface Greeting {
        public function speak($name): string;
    }

    class WellCome implements Greeting {
        public function speak($name): string {
            return "Wellcome " . $name;
        }
    }

    class Hello implements Greeting {
        public function speak($name): string {
            return "Hello " . $name;
        }
    }

    class salam implements Greeting {
        public function speak($name): string {
            return "Salam " . $name;
        }
    }

    class Spoke extends Say {
        use Run, Walk {
            // Run::start insteadOf Walk;
            Walk::start insteadOf Run;
            Run::start as protected start_run;
            Walk::start as protected start_walk;
        }
        
        public function use(Greeting $class): void {
            echo $class->speak($this->name);
            echo "</br>";
        }

        public function laugh(string $name): void {
            echo("$name Say Ha ha ha ha...</br>");
        }

        public function setName(Greeting $class, string $word) {
            $this->name = $word;
            return $class;
        }

        public function pre_start() {
            $this->start_run();
            $this->start_walk();
        }
    }

?>