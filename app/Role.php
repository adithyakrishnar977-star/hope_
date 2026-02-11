<?php

namespace App;

enum Role: string {
    case ADMIN = 'admin';
    case PATIENT = 'patient';
    case THERAPIST = 'therapist';

}
