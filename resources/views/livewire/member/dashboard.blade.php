<div>
    @push('css')
        <link rel="stylesheet" type="text/css" href="assets/css/widgets/modules-widgets.css">
        <link href="/assets/css/components/tabs-accordian/custom-accordions.css" rel="stylesheet" type="text/css" />
    @endpush
    <!--  BEGIN CONTENT PART  -->
    @include('includes.header')

    @include('form.main')
    @include('form.profile')
    @include('form.passive')
    @include('form.active')
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


            window.livewire.on('activeModalClose', (next) => {
                $('#activeModal').modal('hide');
                if (next === true) {
                    $('#activeSubmit').modal('show');
                }
            });

            window.livewire.on('activeSubmitClose', () => {
                $('#activeSubmit').modal('hide');
            });

            // $("#amountActive").on('change keyup', function (e) {
            //     window.livewire.emit('set:activeupdate', this.value);
            // })
        </script>
    @endpush
</div>
