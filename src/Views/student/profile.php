<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Profil</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f5f7fb; margin: 0; padding: 0; }
        .profile-container { display: flex; min-height: 100vh; max-width: 1200px; margin: 20px auto; gap: 20px;}
        .sidebar { width: 250px; background-color: #fff; border-right: 1px solid #ddd; display: flex; flex-direction: column; border-radius: 8px; overflow: hidden; height: fit-content; }
        .sidebar button { padding: 15px; color: #333; text-align: left; border: none; background: none; border-bottom: 1px solid #eee; cursor: pointer; transition: 0.3s; font-size: 15px; }
        .sidebar button:hover { background-color: #f0f0f0; }
        .sidebar button.active { background-color: #0c356a; color: #fff; }
        .content { flex: 1; padding: 30px; background: #fff; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.05); }
        .hidden { display: none; }
        .upload-section { text-align: center; margin-bottom: 20px; }
        .profile-pic { width: 120px; height: 120px; border-radius: 50%; object-fit: cover; margin-bottom: 10px; border: 3px solid #0c356a; }
        .upload-btn { background-color: #0c356a; color: #fff; padding: 8px 15px; border: none; border-radius: 5px; cursor: pointer; }
        label { display: block; margin-top: 15px; font-weight: bold; }
        input, textarea { width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ccc; border-radius: 5px; }
        .btn-group { margin-top: 20px; }
        button.cancel, button.save { padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer; }
        button.cancel { background-color: #e74c3c; color: #fff; }
        button.save { background-color: #0c356a; color: #fff; margin-left: 10px; }
    </style>
</head>
<body>

<?php include __DIR__ . '/../partials/header.php'; ?>

<div class="profile-container">
    <!-- Sidebar -->
    <aside class="sidebar">
        <button class="active" data-section="profil">Informasi Profil</button>
        <button data-section="password">Ganti Kata Sandi</button>
        <button data-section="lainnya">Informasi Lainnya</button>
        <button data-section="sosmed">Sosial Media</button>
    </aside>

    <!-- Main Content -->
    <main class="content">
        <!-- Informasi Profil -->
        <section id="profil">
            <h2>Informasi Profil</h2>
            <div class="upload-section">
                <img src="<?php echo !empty($user['foto']) ? '../public/' . htmlspecialchars($user['foto']) : 'https://cdn-icons-png.flaticon.com/512/149/149071.png'; ?>" alt="Foto Profil" class="profile-pic" id="profilePic">
                <br>
                <button class="upload-btn" id="uploadBtn">Unggah Foto Profil</button>
                <input type="file" id="uploadInput" accept="image/*" style="display:none;">
            </div>

            <form id="profilForm">
                <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                <label>Nama Lengkap</label>
                <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($user['name'] ?? ''); ?>">

                <label>NIM/NIP</label>
                <input type="text" name="nim_nip" id="nim_nip" value="<?php echo htmlspecialchars($user['nim_nip'] ?? ''); ?>">

                <label>Email</label>
                <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($user['email'] ?? ''); ?>">

                <label>Jurusan</label>
                <input type="text" name="jurusan" id="jurusan" value="<?php echo htmlspecialchars($user['jurusan'] ?? ''); ?>">

                <div class="btn-group">
                    <button type="button" class="save" onclick="saveData()">Simpan</button>
                </div>
            </form>
        </section>

        <!-- Ganti Kata Sandi -->
        <section id="password" class="hidden">
            <h2>Ganti Kata Sandi</h2>
            <form id="passwordForm">
                <label>Kata Sandi Lama</label>
                <input type="password" id="oldPass">
                <label>Kata Sandi Baru</label>
                <input type="password" id="newPass">
                <label>Konfirmasi Kata Sandi</label>
                <input type="password" id="confirmPass">
                <div class="btn-group">
                    <button type="reset" class="cancel">Batal</button>
                    <button type="button" class="save">Simpan</button>
                </div>
            </form>
        </section>

        <!-- Informasi Lainnya -->
        <section id="lainnya" class="hidden">
            <h2>Informasi Lainnya</h2>
            <form id="infoForm">
                <label>Deskripsi Diri</label>
                <textarea name="deskripsi" id="deskripsi" rows="3"><?php echo htmlspecialchars($user['deskripsi'] ?? ''); ?></textarea>

                <label>Riwayat Pendidikan SMA</label>
                <input type="text" name="sma" id="sma" value="<?php echo htmlspecialchars($user['sma'] ?? ''); ?>">

                <label>Universitas</label>
                <input type="text" name="univ" id="univ" value="<?php echo htmlspecialchars($user['univ'] ?? ''); ?>">

                <label>Catatan Prestasi</label>
                <textarea name="prestasi" id="prestasi" rows="2"><?php echo htmlspecialchars($user['prestasi'] ?? ''); ?></textarea>

                <div class="btn-group">
                    <button type="button" class="save" onclick="saveData()">Simpan</button>
                </div>
            </form>
        </section>

        <!-- Sosial Media -->
        <section id="sosmed" class="hidden">
            <h2>Sosial Media</h2>
            <form id="sosmedForm">
                <label>LinkedIn</label>
                <input type="text" name="linkedin" id="linkedin" value="<?php echo htmlspecialchars($user['linkedin'] ?? ''); ?>">

                <label>Instagram</label>
                <input type="text" name="instagram" id="instagram" value="<?php echo htmlspecialchars($user['instagram'] ?? ''); ?>">

                <div class="btn-group">
                    <button type="button" class="save" onclick="saveData()">Simpan</button>
                </div>
            </form>
        </section>
    </main>
</div>

<script>
    // Tab Switching Logic
    const buttons = document.querySelectorAll(".sidebar button");
    const sections = document.querySelectorAll("main section");

    buttons.forEach(btn => {
        btn.addEventListener("click", () => {
            buttons.forEach(b => b.classList.remove("active"));
            sections.forEach(s => s.classList.add("hidden"));
            btn.classList.add("active");
            document.getElementById(btn.dataset.section).classList.remove("hidden");
        });
    });

    // Image Upload Preview
    const uploadBtn = document.getElementById("uploadBtn");
    const uploadInput = document.getElementById("uploadInput");
    const profilePic = document.getElementById("profilePic");
    let selectedFile = null;

    uploadBtn.addEventListener("click", () => uploadInput.click());
    uploadInput.addEventListener("change", function() {
        const file = this.files[0];
        if (file) {
            selectedFile = file;
            const reader = new FileReader();
            reader.onload = function(e) {
                profilePic.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });

    // Unified Save Function (AJAX)
    function saveData() {
        const formData = new FormData();
        
        // Append all inputs from active forms
        formData.append('name', document.getElementById('name').value);
        formData.append('nim_nip', document.getElementById('nim_nip').value);
        formData.append('email', document.getElementById('email').value);
        formData.append('jurusan', document.getElementById('jurusan').value);
        
        formData.append('deskripsi', document.getElementById('deskripsi').value);
        formData.append('sma', document.getElementById('sma').value);
        formData.append('univ', document.getElementById('univ').value);
        formData.append('prestasi', document.getElementById('prestasi').value);
        
        formData.append('linkedin', document.getElementById('linkedin').value);
        formData.append('instagram', document.getElementById('instagram').value);

        if (selectedFile) {
            formData.append('foto', selectedFile);
        }

        fetch('index.php?page=profile&action=update', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('✅ Data berhasil disimpan!');
                location.reload();
            } else {
                alert('❌ ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat menyimpan data.');
        });
    }
</script>

</body>
</html>
