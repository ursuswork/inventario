
CREATE TABLE IF NOT EXISTS recibos_unidad (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_maquinaria INT NOT NULL,
    condicion_estimada DECIMAL(5,2),
    empresa_origen VARCHAR(100),
    empresa_destino VARCHAR(100),
    equipo VARCHAR(100),
    inventario VARCHAR(100),
    marca VARCHAR(100),
    serie VARCHAR(100),
    modelo VARCHAR(100),
    motor VARCHAR(100),
    color VARCHAR(50),
    placas VARCHAR(50),

    -- Componentes del motor
    cilindros VARCHAR(10), pistones VARCHAR(10), anillos VARCHAR(10), inyectores VARCHAR(10),
    block VARCHAR(10), cabeza VARCHAR(10), varillas VARCHAR(10), resortes VARCHAR(10),
    punterias VARCHAR(10), cigueñal VARCHAR(10), arbol_elevas VARCHAR(10), retenes VARCHAR(10),
    ligas VARCHAR(10), sensores_motor VARCHAR(10), poleas VARCHAR(10), concha VARCHAR(10),
    cremallera VARCHAR(10), clutch VARCHAR(10), coples VARCHAR(10), bomba_inyeccion VARCHAR(10),
    juntas VARCHAR(10), marcha VARCHAR(10), alternador VARCHAR(10), filtros VARCHAR(10),
    bases VARCHAR(10), soportes VARCHAR(10), turbo VARCHAR(10), escape VARCHAR(10), chicotes VARCHAR(10),

    -- Mecánico
    transmision VARCHAR(10), diferenciales VARCHAR(10), cardan VARCHAR(10),

    -- Eléctrico
    alarmas VARCHAR(10), arneses VARCHAR(10), bobinas VARCHAR(10), botones VARCHAR(10),
    cables VARCHAR(10), cables_sensores VARCHAR(10), conectores VARCHAR(10),
    electro_valvulas VARCHAR(10), fusibles VARCHAR(10), porta_fusibles VARCHAR(10),
    indicadores VARCHAR(10), presion_agua_temp_volt VARCHAR(10), luces VARCHAR(10),
    modulos VARCHAR(10), torreta VARCHAR(10), relevadores VARCHAR(10),
    switch_llave VARCHAR(10), sensores_ee VARCHAR(10),

    -- Estético
    estetico VARCHAR(10), pintura VARCHAR(10), calcomanias VARCHAR(10),
    asiento VARCHAR(10), tapiceria VARCHAR(10), tolvas VARCHAR(10), cristales VARCHAR(10),
    accesorios VARCHAR(10), sistema_riego VARCHAR(10),

    -- Hidráulico
    banco_valvulas VARCHAR(10), bombas_accesorios VARCHAR(10), coples_hidraulicos VARCHAR(10),
    clutch_hidraulico VARCHAR(10), gatos_levante VARCHAR(10), gatos_direccion VARCHAR(10),
    gatos_accesorios VARCHAR(10), mangueras VARCHAR(10), motores_hidraulicos VARCHAR(10),
    orbitrol VARCHAR(10), torques_huv_satelites VARCHAR(10), valvulas_retencion VARCHAR(10),
    reductores VARCHAR(10),

    -- Consumibles
    puntas VARCHAR(10), cuchillas VARCHAR(10), cepillos VARCHAR(10), separadores VARCHAR(10),
    llantas VARCHAR(10), rines VARCHAR(10), bandas_orugas VARCHAR(10),

    observaciones TEXT,

    FOREIGN KEY (id_maquinaria) REFERENCES maquinaria(id) ON DELETE CASCADE
);
