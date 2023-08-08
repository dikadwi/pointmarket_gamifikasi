<?php

namespace App\Controllers;

use App\Models\KontakModel;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;

class Home extends BaseController
{

    protected $kontak;

    public function __construct()
    {
        $this->kontak = new KontakModel();
    }

    public function index()
    {
        $data['kontak'] = $this->kontak->findAll();
        return view('home', $data);
    }

    public function add()
    {
        return view('add');
    }

    public function save()
    {
        $id = time();
        $nama = $this->request->getVar('nama');
        $ponsel = $this->request->getVar('ponsel');
        $email = $this->request->getVar('email');
        $organisasi = $this->request->getVar('organisasi');

        $writer = new PngWriter();

        // Create QR code
        $qrCode = QrCode::create($nama . $email . $organisasi)
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
            ->setSize(300)
            ->setMargin(10)
            ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->setForegroundColor(new Color(0, 0, 0))
            ->setBackgroundColor(new Color(255, 255, 255));

        // Create generic logo
        $logo = null;

        // Create generic label
        $label = Label::create($nama)
            ->setTextColor(new Color(255, 0, 0));

        $result = $writer->write($qrCode, $logo, $label);

        $qr = $result->getDataUri();

        $data = [
            'id_kontak' => $id,
            'nama' => $nama,
            'ponsel' => $ponsel,
            'email' => $email,
            'organisasi' => $organisasi,
            'qrcode' => $qr
        ];
        $this->kontak->save($data);
        return redirect()->to('home');
    }
}
