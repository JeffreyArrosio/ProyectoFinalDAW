<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Ver si un usuario puede ver otro usuario.
     */
    public function view(User $authUser, User $user)
    {
        return true; // o lógica personalizada
    }

    /**
     * Ver si un usuario puede ver la relación 'news' de otro.
     */
    public function viewRelatedNews(User $authUser, User $user)
    {
        // Por ejemplo: solo puedes ver tus propias noticias
        return true;
    }

    /**
     * Ver si un usuario puede ver sus followers.
     */
    public function viewRelatedFollowers(User $authUser, User $user)
    {
        return $authUser->id === $user->id;
    }

    /**
     * Ver si un usuario puede ver a quién sigue.
     */
    public function viewRelatedFollowing(User $authUser, User $user)
    {
        return $authUser->id === $user->id;
    }

    /**
     * Ver si un usuario puede relacionar una noticia con su cuenta.
     */
    public function attachNews(User $authUser, User $user)
    {
        return $authUser->id === $user->id;
    }

    public function detachNews(User $authUser, User $user)
    {
        return $authUser->id === $user->id;
    }

    /**
     * Si quieres permitir acceso completo (DEV ONLY)
     */
    public function before(User $authUser, $ability)
    {
        // return true; // ⚠️ Esto desactiva todas las restricciones
    }
}
