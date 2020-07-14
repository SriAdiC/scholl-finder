<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <?= $this->session->flashdata('message'); ?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Nama</th>
                <th scope="col">email</th>
            </tr>
        </thead>

        <?php foreach ($user as $u) : ?>
            <tr>

                <td><?= $u['name']; ?></td>
                <td><?= $u['email']; ?></td>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>