<div>
    @push('css')
        <link rel="stylesheet" type="text/css" href="assets/css/widgets/modules-widgets.css">
        <link href="/assets/css/components/tabs-accordian/custom-accordions.css" rel="stylesheet" type="text/css" />
    @endpush
    <!--  BEGIN CONTENT PART  -->
    @include('includes.header')

    @include('form.main')
    @include('form.profile')
    @include('form.password')
    @push('scripts')
        <script>
            function copyToClipboard(text) {
                var input = document.body.appendChild(document.createElement("input"));
                input.value = text;
                input.focus();
                input.select();
                document.execCommand('copy');
                input.parentNode.removeChild(input);
                alert('Referral Copied');
            }
            window.livewire.on('profileModalClose', () => {
                $('#profileModal').modal('hide');
            });
            window.livewire.on('passwordModalClose', () => {
                $('#passwordModal').modal('hide');
            });
        </script>
    @endpush
</div>
