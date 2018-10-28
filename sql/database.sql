CREATE DABTABASE admev;
USE admev;

CREATE TABLE puesto (
    idPuesto INT NOT NULL,
    nombrePuesto VARCHAR(50),
    PRIMARY KEY(idPuesto)
);

CREATE TABLE usuario (
    idUsuario INT NOT NULL,
    nombreUsuario VARCHAR(100),
    contrasenaUsuario VARCHAR(255),
    idPuestoUsario INT NOT NULL,
    PRIMARY KEY(idUsuario),
    FOREIGN KEY(idPuestoUsario) REFERENCES puesto(idPuesto)
);

CREATE TABLE auditorio (
    idAuditorio INT NOT NULL,
    nombreAuditorio VARCHAR(40),
    min INT NOT NULL,
    max INT NOT NULL,
    PRIMARY KEY(idAuditorio)
);

CREATE TABLE info_auditorio (
    idInfoAuditorio INT NOT NULL,
    descripcionIA VARCHAR(500),
    historiaIA VARCHAR(500),
    PRIMARY KEY(idInfoAuditorio)
);

CREATE TABLE foto_auditorio (
    idFotoAuditorio INT NOT NULL,
    idAuditorioFotoAuditorio INT NOT NULL,
    fotoAuditorio BLOB(10),
    PRIMARY KEY(idFotoAuditorio)
);

CREATE TABLE evento (
    idEvento INT NOT NULL,
    nombreEvento VARCHAR(50),
    idAuditorioEvento INT NOT NULL,
    PRIMARY KEY(idEvento),
    FOREIGN KEY(idAuditorioEvento) REFERENCES auditorio(idAuditorio)
);
