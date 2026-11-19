CREATE TABLE "public"."users" (
    "id" serial NOT NULL,
    "username" varchar(255) NOT NULL,
    "password" varchar(255) NOT NULL,
    CONSTRAINT "users_pkey" PRIMARY KEY ("id")
);

CREATE TABLE "public"."siswa" (
    "id" serial NOt NULL,
    "nisn" varchar(255) NOT NULL,
    "nama" varchar(255) NOT NULL,
    "tanggal_lahir" date NOT NULL,
    "alamat" text NOT NULL,
    CONSTRAINT "siswa_pkey" PRIMARY KEY ("id"),
    UNIQUE (nisn)
);

CREATE TABLE "public"."mata_pelajaran" (
    "id" serial NOT NULL,
    "kode_mata_pelajaran" varchar(255) NOT NULL,
    "nama" varchar(255) NOT NULL,
    CONSTRAINT "mata_pelajaran_pkey" PRIMARY KEY ("id"),
    UNIQUE(kode_mata_pelajaran)
);

CREATE TABLE "public"."jadwal_kelas" (
    "id" serial NOT NULL,
    "id_siswa" integer REFERENCES siswa (id),
    "id_mata_pelajaran" integer REFERENCES mata_pelajaran (id),
    "jadwal" timestamp,
    CONSTRAINT "jadwal_kelas_pkey" PRIMARY KEY ("id")
);

CREATE TABLE "public"."file_mata_pelajaran" (
    "id" serial NOT NULL,
    "id_mata_pelajaran" integer REFERENCES mata_pelajaran (id),
    "nama_file" varchar(255) NOT NULL,
    "keterangan" varchar(255) NOT NULL
);