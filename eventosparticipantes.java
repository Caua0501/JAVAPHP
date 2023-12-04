import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

public class eventosparticipantes {
    private static final String URL = "jdbc:mysql://localhost:3306/registro_evento";
    private static final String USUARIO = "root";
    private static final String SENHA = "";

    public static void main(String[] args) throws SQLException {
        Connection conexao = DriverManager.getConnection(URL, USUARIO, SENHA);

        conexao.createStatement().executeUpdate("CREATE TABLE IF NOT EXISTS eventos (id_evento INT AUTO_INCREMENT PRIMARY KEY, nome_evento VARCHAR(255), data TIMESTAMP DEFAULT CURRENT_TIMESTAMP)");

        conexao.createStatement().executeUpdate("CREATE TABLE IF NOT EXISTS participantes (id_participante INT AUTO_INCREMENT PRIMARY KEY, id_evento INT, nome_participante VARCHAR(255))");

        conexao.createStatement().executeUpdate("INSERT INTO eventos (nome_evento) VALUES ('CENA2K23')");
        conexao.createStatement().executeUpdate("INSERT INTO eventos (nome_evento) VALUES ('Rock In Rio')");

        conexao.createStatement().executeUpdate("INSERT INTO participantes (nome_participante, id_evento) VALUES ('Marcos', 2)");
        conexao.createStatement().executeUpdate("INSERT INTO participantes (nome_participante, id_evento) VALUES ('Cauã', 2)");

        conexao.createStatement().executeUpdate("INSERT INTO eventos_participantes (id_participantes) VALUES (1)");
        conexao.createStatement().executeUpdate("INSERT INTO eventos_participantes (id_participantes) VALUES (2)");

        conexao.close();
    }
}
