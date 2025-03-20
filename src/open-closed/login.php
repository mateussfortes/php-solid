<?php
    // OCP VIOLATION
    class LoginService
    {
        public function login($user)
        {
            if ($user instanceof User) {
                $this->authenticateUser($user);
            } else if ($user instanceOf ThirdPartyUser) {
                $this->authenticateThirdPartyUser($user);
            }
        }
    }    


    // FOLLOWING OCP
    interface LoginInterface {
        public function authenticateUser(UserInterface $user);
    }

    class UserAuthentication implements LoginInterface {
        public function authenticateUser(UserInterface $user) {
            // logic here
        }
    }

    class ThirdPartyUserAuthentication implements LoginInterface {
        public function authenticateUser(UserInterface $user) {
            // logic here
        }
    }

    class LoginService {
        public function login (LoginInterface $loginService, UserInterface $user) {
            $loginService->authenticateUser($user);
        }
    }