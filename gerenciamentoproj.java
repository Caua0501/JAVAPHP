import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

public class gerenciamentoproj {
    private static final String URL = "jdbc:mysql://localhost:3306/projetos_atribuicoes";
    private static final String USUARIO = "root";
    private static final String SENHA = "";

    public static void main(String[] args) throws SQLException {
        Connection conexao = DriverManager.getConnection(URL, USUARIO, SENHA);

        conexao.createStatement().executeUpdate("CREATE TABLE IF NOT EXISTS projetos (id_projeto INT AUTO_INCREMENT PRIMARY KEY, nome_projeto VARCHAR(255), descricao VARCHAR(255))");

        conexao.createStatement().executeUpdate("CREATE TABLE IF NOT EXISTS atribuicoes (id_atribuicao INT AUTO_INCREMENT PRIMARY KEY, id_projeto INT, id_funcionario INT)");

        conexao.createStatement().executeUpdate("INSERT INTO projetos (nome_projeto, descricao) VALUES ('Projeto P', 'Descrição do Projeto O')");
        conexao.createStatement().executeUpdate("INSERT INTO projetos (nome_projeto, descricao) VALUES ('Projeto R', 'Descrição do Projeto V')");

        conexao.createStatement().executeUpdate("INSERT INTO atribuicoes (id_projeto, id_funcionario) VALUES (1, 1)");
        conexao.createStatement().executeUpdate("INSERT INTO atribuicoes (id_projeto, id_funcionario) VALUES (2, 2)");

        conexao.close();
    }
}
