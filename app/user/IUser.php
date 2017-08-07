<?php

namespace CMS\User;

interface IUser {
    
    function isAuthenticated();
    
    function isLoggedIn();
    
}

