<script>
    @if (Session::has('success'))
    toastr.success(' {{ Session::get('success') }}')
    @endif
    @if (Session::has('failed'))
    toastr.error('{{ Session::get('failed') }}')
    @endif

    @if (Session::has('warning'))
    toastr.warning('{{ Session::get('warning') }}')
    @endif

    @if (Session::has('info'))
    toastr.info('{{ Session::get('info') }}')
    @endif
</script>
