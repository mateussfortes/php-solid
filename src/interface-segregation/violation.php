<?php
    interface Workable {
        public function canCode();
        public function code();
        public function test();
    }

    class Developer implements Workable 
    {
        public function canCode()
        {
            return true;
        }
        public function code()
        {
            return "";
        }
        public function test() {
            return 'testing in localhost';
        }
    }

    class Tester implements Workable
    {
        public function canCode()
        {
            return false;
        }
        public function code()
        {
            // El QA no puede programar
            throw new Exception('Opps! I can not code');
        }
        public function test()
        {
            return 'testing in test server';
        }
    }

    class ProjectManagement
    {
        public function processCode(Workable $member)
        {
            if ($member->canCode()) {
                $member->code();
            }
        }
    }