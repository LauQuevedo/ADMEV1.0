CREATE DATABASE admev;
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
    idPuestoUsuario INT NOT NULL,
    PRIMARY KEY(idUsuario),
    FOREIGN KEY(idPuestoUsuario) REFERENCES puesto(idPuesto)
);

--ALTER TABLE usuario CHANGE idPuestoUsario IdPuestoUsuario INT(11);

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

CREATE TABLE material (
    idMaterial INT NOT NULL,
    descripcionMaterial VARCHAR(100),
    cantidadMaterial INT NOT NULL,
    PRIMARY KEY(idMaterial)
);

CREATE TABLE auditorio_material (
    idAuditorioMaterial INT NOT NULL,
    idAuditorioMat INT NOT NULL,
    idMaterialAudi INT NOT NULL,
    PRIMARY KEY(idAuditorioMaterial)
);

CREATE TABLE archivos_solicitud (
    idArchivosSolicitud INT NOT NULL,
    idEventoArchivosSol INT NOT NULL,
    PRIMARY KEY(idArchivosSolicitud)
);

CREATE TABLE solicitante (
    idSolicitante INT NOT NULL,
    nombreSolicitante VARCHAR(50) NOT NULL,
    apellidoPSolicitante VARCHAR(50) NOT NULL,
    apellidoMSolicitante VARCHAR(50) NOT NULL,
    codigoSolicitante VARCHAR(10) NOT NULL,
    carreraSolicitante VARCHAR(5),
    PRIMARY KEY(idSolicitante)
);

CREATE TABLE responsable (
    idResponsable INT NOT NULL,
    nombreResponsable VARCHAR(50) NOT NULL,
    apellidoPResponsable VARCHAR(50) NOT NULL,
    apellidoMResponsable VARCHAR(50) NOT NULL,
    codigoResponsable VARCHAR(10) NOT NULL,
    puestoResponsable VARCHAR(20),
    PRIMARY KEY(idResponsable)
);

CREATE TABLE solicitante_responsable (
    idSolRes INT NOT NuLL,
    idSolicitanteRes INT NOT NULL,
    idResponsableSol INT NOT NULL,
    PRIMARY KEY(idSolRes)
);
