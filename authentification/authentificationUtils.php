<?php

function isLogged() {
    return isset($_SESSION['login']);
}

// Utilisateur non membre
function isNonMemberUser() {
    return !isLogged();
}

// Utilisateur membre
function isMemberUser() {
    return isLogged() && !$_SESSION['isAdmin']; // if the field 'login' is set, 'isAdmin' should always be set too.
}

// Administrateur
function isAdmin() {
    return isLogged() && $_SESSION['isAdmin']; // if the field 'login' is set, 'isAdmin' should always be set too.
}

?>