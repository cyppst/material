<script src="/assets/js/popper.min.js"></script>

<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/main.js"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="/assets/js/plugins/pace.min.js"></script>

<script type="text/javascript" src="/assets/js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-*.min.js"></script>

<script type="text/javascript">$('#sampleTable').DataTable();</script>
<script type="text/javascript">
    $(document).ready(function () {
        let p = window.location.pathname;
        console.log(p);
        $("a:has(a[href='" + p + "'])").addClass("active");
        $('.selectpicker').selectpicker({
            style: 'btn-info',
            size: 4
        });

    })
</script>


</body>
</html>