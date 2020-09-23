<?php
/**
 * @return string|null
 */
function guardName()
{
    if(auth()->user() instanceof \App\Models\Admin)
        return 'admin';
    if(auth()->user() instanceof \App\Models\User)
        return 'user';
    return null;
}
