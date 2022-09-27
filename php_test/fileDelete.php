<?php

if (unlink("file.txt")) {
    echo "Deleted";
} else {
    echo "Not Delete";
}
