<?php

function connect() {
    return new PDO("mysql:host=localhost;dbname=diario_oficial", "lucas", "lucas", [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        ]
    );
}

