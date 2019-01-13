<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> {{ config('app.version') }}
    </div>
    <strong>Copyright &copy; {{ \Carbon\Carbon::now()->format('Y') }} <a href="https://github.com/Tenebreizh">Thibaud Philippi</a>.</strong> All rights reserved.
</footer>