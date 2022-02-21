
@if (isset($user))
    <div class="card card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-sm">
                <tbody>
                    <tr>
                        <th>Name</th>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th>ID Number</th>
                        <td>{{ $settings->id_number ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td>{{ $settings->phone ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Meter Number</th>
                        <td>{{ $user->meter_number }}</td>
                    </tr>
                    <tr>
                        <th>Province</th>
                        <td>{{ $settings->province ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>District</th>
                        <td>{{ $settings->district ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Sector</th>
                        <td>{{ $settings->sector ?? '' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endif
