<li class="nav-item {{ Request::is('mains*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('mains.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Главная</span>
    </a>
</li>
<li class="nav-item {{ Request::is('abouts*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('abouts.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>О Нас</span>
    </a>
</li>
<li class="nav-item {{ Request::is('services*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('services.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Услуги</span>
    </a>
</li>
<li class="nav-item {{ Request::is('projects*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('projects.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Проекты</span>
    </a>
</li>
<li class="nav-item {{ Request::is('contacts*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('contacts.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Контакты</span>
    </a>
</li>
<li class="nav-item {{ Request::is('advantages*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('advantages.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Преимущества</span>
    </a>
</li>
<li class="nav-item {{ Request::is('freedomRequests*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('freedomRequests.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Freedom Credit Заявки</span>
    </a>
</li>
<li class="nav-item {{ Request::is('freedomTokens*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('freedomTokens.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Freedom Tokens</span>
    </a>
</li>
<li class="nav-item {{ Request::is('freedomResponses*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('freedomResponses.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Freedom Responses</span>
    </a>
</li>
