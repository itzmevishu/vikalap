<header class="blog-header py-3 border-bottom">
    <div class="row flex-nowrap justify-content-between align-items-center">
        <div class="col-4 pt-1">
            <p class="my-auto">
                <a href="https://www.linkedin.com/in/kalappagarivishal/" class="pr-3 text-decoration-none" target="_blank" rel="noopener">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                </a>
            </p>
        </div>
        <div class="col-4 text-center">
            <a id="brand" class="text-dark font-weight-bolder text-decoration-none font-serif" href="{{ route('welcome') }}">{{ config('app.name', __('canvas::blog.title')) }}</a>
        </div>

        @auth()
            <div class="col-4 d-flex justify-content-end align-items-center">
                @yield('actions')

                <div class="dropdown">
                    <a href="#" class="nav-link px-0 py-0 text-secondary" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ sprintf('%s%s%s', 'https://secure.gravatar.com/avatar/', md5(strtolower(trim(auth()->user()->email))), '?s=200') }}"
                             class="rounded-circle my-0 shadow-sm" style="width: 31px" alt="{{ auth()->user()->name }}">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <h6 class="dropdown-header font-sans">
                            <strong>{{ auth()->user()->name }}</strong>
                            <br/>
                            {{ auth()->user()->email }}
                        </h6>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ url(sprintf('%s/posts', config('canvas.path'))) }}">{{ __('canvas::blog.nav.user.posts') }}</a>
                        <a class="dropdown-item" href="{{ url(sprintf('%s/tags', config('canvas.path'))) }}">{{ __('canvas::blog.nav.user.tags') }}</a>
                        <a class="dropdown-item" href="{{ url(sprintf('%s/topics', config('canvas.path'))) }}">{{ __('canvas::blog.nav.user.topics') }}</a>
                        <a class="dropdown-item" href="{{ url(sprintf('%s/stats', config('canvas.path'))) }}">{{ __('canvas::blog.nav.user.stats') }}</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            {{ __('canvas::blog.nav.user.logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        @endauth

        @guest()
            <div class="col-4 d-flex justify-content-end align-items-center">
                <a class="text-muted text-decoration-none" href="{{ url(config('canvas.path')) }}">{{ __('canvas::blog.nav.user.login') }}</a>
            </div>
        @endguest
    </div>
</header>
