<?= $this->extend('layouts/user-template') ?>
<?= $this->section('content') ?>
<style>
    table.table {
        color: white;
    }
</style>
<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
    <div class="col-sm-12 col-md-12 col-xl-12 pb-3">
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">Referral list</h6>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Joined date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $counter = 1; ?>
                        <?php if (!empty($AllReffs)): ?>
                        <?php foreach ($AllReffs as $refs): ?>
                        <tr>
                            <th><?= $counter++; ?></th>
                            <td><?= $refs['username']; ?></td>
                            <td><?= $refs['email']; ?></td>
                            <?php
                                $carbonDate = \Carbon\Carbon::parse($refs['create_at']);
                                $formatedDate = $carbonDate->format('d F Y');
                            ?>
                            <td><?= $formatedDate; ?></td>
                        </tr>
                        <?php endforeach; ?>
                        <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">No record found!</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-sm-12 col-md-12 col-xl-12">
        <div class="bg-secondary rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Your referral link</h6>
            </div>
            <div class="d-flex mb-2">
                <input class="form-control bg-transparent" type="text" id="urlInput" value="<?= base_url('reff/' . $reffcode);?>" readonly />
                <button type="button" class="btn btn-primary ms-2" id="copyButton" onclick="copyText()">copy</button>
            </div>
        </div>
    </div>
</div>
<!-- Blank End -->
<script>
    function copyText() {
        const input = document.getElementById('urlInput');
        input.select();
        document.execCommand('copy');
        document.getElementById('copyButton').innerText = 'copied';
        alert('Link successfully copied.');
        setTimeout(() => {
            document.getElementById('copyButton').innerText = 'copy';
        }, 2000);
    }
</script>
<?= $this->endSection() ?>