<?php

class LombaController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $data = $this->model('Lomba')->getAllLomba();
        $this->view("layout/header");
        $this->view("layout/sidebar");
        $this->view("lomba/lomba", $data);
        $this->view("layout/footer");
    }

    public function showLombas()
    {
        $data['Lomba'] = $this->model('Lomba')->getAllLomba();
        $this->view("layout/header");
        $this->view("layout/sidebar");
        $this->view("lomba/lomba", $data);
        if (isset($data['Lomba'])) {
            $this->view("lomba/lomba", $data['Lomba']);
        }
        $this->view("layout/footer");
    }

    public function addDataLomba()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dataKompetisi = [
                'kategori_id' => $_POST['kategori_id'] ?? null,
                'tingkat' => $_POST['tingkat'] ?? null,
                'nama_lomba' => $_POST['nama_kompetisi'] ?? null,
                'deskripsi_lomba' => $_POST['deskripsi'] ?? null,
                'link_lomba' => $_POST['link_kompetisi'] ?? null,
                'deadline_lomba' => $_POST['tanggal_kompetisi'] ?? null
            ];
            $this->model('Lomba')->addLomba($dataKompetisi);

            header('Location:' . getMenu($_SESSION['level_id'], 'menu4')['route']);
            exit;
        }
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return $this->view('lomba.create');
    }

    // Store a newly created resource in storage.
    public function store()
    {
        $data = [
            'kategori_id' => $_POST['kategori_id'],
            'nama_lomba' => $_POST['nama_lomba'],
            'tingkat' => $_POST['tingkat'],
            'deskripsi_lomba' => $_POST['deskripsi_lomba'],
            'link_lomba' => $_POST['link_lomba'],
            'deadline_lomba' => $_POST['deadline_lomba']
        ];

        $lombaModel = new Lomba();
        $lombaModel->addLomba($data);
        header('Location:' . getMenu($_SESSION['level_id'], 'menu5')['route']);
    }

    // Display the specified resource.
    public function show($id)
    {
        $lombaModel = new Lomba();
        $lomba = $lombaModel->getLombaById($id);
        return $this->view('lomba.show', ['lomba' => $lomba]);
    }

    // Show the form for editing the specified resource.
    public function edit($id)
    {
        $lombaModel = new Lomba();
        $lomba = $lombaModel->getLombaById($id);
        return $this->view('lomba.edit', ['lomba' => $lomba]);
    }

    // Update the specified resource in storage.
    public function update($id)
    {
        $data = [
            'lomba_id' => $id,
            'kategori_id' => $_POST['kategori_id'],
            'nama_lomba' => $_POST['nama_lomba'],
            'tingkat' => $_POST['tingkat'],
            'deskripsi_lomba' => $_POST['deskripsi_lomba'],
            'link_lomba' => $_POST['link_lomba'],
            'deadline_lomba' => $_POST['deadline_lomba']
        ];

        $lombaModel = new Lomba();
        $lombaModel->updateLomba($data);
        header('Location:' . getMenu($_SESSION['level_id'], 'menu5')['route']);
    }
    public function showFormLomba($lombaId = null)
    {
        $this->view("layout/header");
        $this->view("layout/sidebar");

        // Jika ada ID lomba, ambil data lomba yang relevan
        if (isset($lombaId)) {
            $data['Lomba'] = $this->model('Lomba')->getLombaById('id_lomba', $lombaId);

            // Tampilkan form dengan data lomba yang sudah ada
            $this->view("lomba/formLomba", $data);
        } else {
            // Tampilkan form kosong untuk menambahkan lomba
            $this->view("lomba/formLomba");
        }

        $this->view("layout/footer");
    }


    // Remove the specified resource from storage.
    public function destroy($id)
    {
        $lombaModel = new Lomba();
        $lombaModel->deleteLomba($id);
        header('Location:' . getMenu($_SESSION['level_id'], 'menu5')['route']);
    }
}
