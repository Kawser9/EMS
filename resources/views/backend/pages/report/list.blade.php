@extends('backend.master')
@section('content')


  <div class="container mt-12">
    <div class="row">
        <div class="col-md-12 offset-md-12">
            <h2 class="text-center mb-4">Report Generator</h2>

            <!-- Report Type Dropdown -->
            <div class="col-md-4">
                <div class="btn-group">
                    <a class="btn btn-danger" href="{{Route('depWiseReport.list')}}">Dep-wise Employee Report</a>
                    <a class="btn btn-primary" href="{{Route('report.selary.ditails.total')}}">Salary Distribution Report</a>
                    <button type="button" class="btn btn-secondary" onclick="showReportTable('birthday')">Birthday Report</button>
                    <button type="button" class="btn btn-secondary" onclick="showReportTable('hiringDate')">Hiring Date Report</button>
                    <button type="button" class="btn btn-secondary" onclick="showReportTable('salaryReport')">Salary Distribution Report</button>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- 

<script>
    function showReportTable() {
                // Hide all report tables
                document.querySelectorAll('.report-table').forEach(function(table) {
                    table.style.display = 'none';
                });

                // Show the selected report table
                var selectedReportType = document.getElementById('reportType').value;
                if (selectedReportType) {
                    var selectedTable = document.getElementById(selectedReportType + 'Table');
                    if (selectedTable) {
                        selectedTable.style.display = 'block';
                        // Store selected report type in localStorage
                        localStorage.setItem('selectedReportType', selectedReportType);
                    }
                }
            }


</script> --}}
@endsection
