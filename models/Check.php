<?php

namespace models;


use models\pages\PageModel;

class Check
{
    private $userRole;

    public function __construct($userRole)
    {
        $this->userRole = $userRole;
    }

    public function getCurrentUrlSlug()
    {
        $url = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $parseUrl = parse_url($url);
        $path = $parseUrl['path'];
        $pathWithoutBase = str_replace(APP_BASE_PATH, '', $path);

        $segments = explode('/', ltrim($pathWithoutBase, '/'));
        $firstTwoSegments = array_slice($segments, 0, 2);
        $slug = implode('/', $firstTwoSegments);
        return $slug;
    }

    public function checkPermission($slug)
    {
        // Получить информацию о странице по slug
        $pageModel = new PageModel();
        $page = $pageModel->findBySlug($slug);

        if (!$page) {
            return false;
        }
        // Получить разрешенные роли для страницы
        $allowedRoles = explode(',', $page['role']);
        // Проверить, имеет ли текущий пользователь доступ к странице
        if (isset($_SESSION['user_role']) && in_array($_SESSION['user_role'], $allowedRoles)) {
            return true;
        } else {
            return false;
        }
    }

    public function requirePermission(): void
    {
        $slug = $this->getCurrentUrlSlug();

        if (!$this->checkPermission($slug)) {
            $path = '/' . APP_BASE_PATH;
            header("Location: $path");
            exit();
        }
    }

    public function isCurrentUserRole($role): bool
    {
        return $this->userRole == $role;
    }
}