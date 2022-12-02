function verificar_campos(campos) {
    for (i = 0; i < campos.length; i++) {
        if (campos[i].trimStart().trimEnd() === "") {
            return 0;
        }
    }
}
