<div class="container py-4">
    <div class="row gx-5 gy-4">
        <!-- Prima tabella -->
        <div class="col-12 ">
            <h2 class="mb-3">SPOTTED</h2>
            <div class="table-responsive shadow-sm rounded-3 border">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-primary text-primary">
                    <tr>
                        <th style="width: 40px;">#</th>
                        <th>Username</th>
                        <th>Punti</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->username }}</td>

                            <td>{{ $item->points }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-3 d-flex justify-content-end">

            </div>
        </div>
    </div>
</div>
