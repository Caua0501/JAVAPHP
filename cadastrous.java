import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.SQLException;

public class cadastrous {
        private static final String host = "localhost";
    private static final String database = "exercicio";
    private static final String usuario = "root";
    private static final String senha = "";

    public static void main(String[] args) {
        try (Connection conexao = DriverManager.getConnection("jdbc:mysql://" 
        + host + ":3306/" + database, usuario, senha)) {
            String nome = "Marquinho Relâmpago";
            String email = "0001010204@senaimgaluno.com.br";
            String telefone = "34998596710";

            String sql = "INSERT INTO cadastro_usuario (nome, email, telefone) VALUES (?, ?, ?)";
            PreparedStatement stmt = conexao.prepareStatement(sql);
            stmt.setString(1, nome);
            stmt.setString(2, email);
            stmt.setString(3, telefone);


            int LinhasAfetadas = stmt.executeUpdate();

            if (LinhasAfetadas > 0) {
                System.out.println("Produto inserido com sucesso!");
            } else {
                System.out.println("Não foi possivel inserir o produto");
            }
        } catch (SQLException e) {
            System.out.println("Erro ao conectar ao banco de Dados: " + 
            e.getMessage()) ; 
        }

    }
}

