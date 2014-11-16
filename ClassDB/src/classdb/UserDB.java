
package classdb;

import java.sql.*;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.util.*;

public class UserDB extends User implements CRUD{
    protected static Connection dbConnect = null;

    public UserDB() {
    }

    public UserDB(String nom, String prenom, String login,
            String motdepasse, int admin) {
        super(0, nom, prenom, login, motdepasse, admin);
    }

    public UserDB(int idclient, String nom, String prenom, String login,
            String motdepasse, int admin) {
        super(idclient, nom, prenom, login, motdepasse, admin);
    }

    public UserDB(String nom) {
        this.nom = nom;
    }

    public UserDB(int idclient) {
        super(idclient, "", "", "", "", 0);
    }

    public static void setConnection(Connection nouvdbConnect) {
        dbConnect = nouvdbConnect;
    }

    public void create() throws Exception {
        CallableStatement cstmt = null;
        try {
            String req = "call create_user(?,?,?,?,?,?)";
            cstmt = dbConnect.prepareCall(req);
            cstmt.registerOutParameter(1, java.sql.Types.INTEGER);
            cstmt.setString(2, nom);
            cstmt.setString(3, prenom);
            cstmt.setString(4, login);
            cstmt.setString(5, motdepasse);
            cstmt.setInt(6, admin);
            cstmt.executeUpdate();
            this.iduser = cstmt.getInt(1);

        } catch (SQLException e) {

            throw new Exception("Erreur de création " + e.getMessage());
        } finally {//effectué dans tous les cas 
            try {
                cstmt.close();
            } catch (Exception e) {
            }
        }
    }

    public void read() throws Exception {

        /*String req = "{?=call readcli(?)}";

        CallableStatement cstmt = null;
        try {
            cstmt = dbConnect.prepareCall(req);
            cstmt.registerOutParameter(1, oracle.jdbc.OracleTypes.CURSOR);
            cstmt.setString(2, nom);
            cstmt.executeQuery();
            ResultSet rs = (ResultSet) cstmt.getObject(1);
            if (rs.next()) {
                this.iduser = rs.getInt("ID_USER");
                this.prenom = rs.getString("PRENOM");
                this.cp = rs.getString("CP");
                this.localite = rs.getString("LOCALITE");
                this.rue = rs.getString("RUE");
                this.num = rs.getString("NUM");
                this.tel = rs.getString("TEL");

            } else {
                throw new Exception("Code inconnu");
            }

        } catch (Exception e) {

            throw new Exception("Erreur de lecture " + e.getMessage());
        } finally {//effectué dans tous les cas 
            try {
                cstmt.close();
            } catch (Exception e) {
            }
        }*/
    }

   /* public static ArrayList<ClientDB> rechNom(String nomrech) throws Exception {
        ArrayList<ClientDB> plusieurs = new ArrayList<ClientDB>();
        String req = "{?=call readclinom(?)}";

        CallableStatement cstmt = null;
        try {
            cstmt = dbConnect.prepareCall(req);
            cstmt.registerOutParameter(1, oracle.jdbc.OracleTypes.CURSOR);
            cstmt.setString(2, nomrech);
            cstmt.executeQuery();
            ResultSet rs = (ResultSet) cstmt.getObject(1);
            boolean trouve = false;
            while (rs.next()) {
                trouve = true;
                int idclient = rs.getInt("IDCLIENT");
                String nom = rs.getString("NOM");
                String prenom = rs.getString("PRENOM");
                String cp = rs.getString("CP");
                String localite = rs.getString("LOCALITE");
                String rue = rs.getString("RUE");
                String num = rs.getString("NUM");
                String tel = rs.getString("TEL");
                plusieurs.add(new ClientDB(idclient, nom, prenom, cp, localite, rue, num, tel));
            }

            if (!trouve) {
                throw new Exception("nom inconnu");
            } else {
                return plusieurs;
            }
        } catch (Exception e) {

            throw new Exception("Erreur de lecture " + e.getMessage());
        } finally {//effectué dans tous les cas 
            try {
                cstmt.close();
            } catch (Exception e) {
            }
        }
    }*/

    public void update() throws Exception {
        CallableStatement cstmt = null;

        try {
            String req = "call update_user(?,?,?,?,?,?)";
            cstmt = dbConnect.prepareCall(req);
            PreparedStatement pstm = dbConnect.prepareStatement(req);
            cstmt.setInt(1, iduser);
            cstmt.setString(2, nom);
            cstmt.setString(3, prenom);
            cstmt.setString(4, login);
            cstmt.setString(5, motdepasse);
            cstmt.setInt(6, admin);
            cstmt.executeUpdate();

        } catch (Exception e) {

            throw new Exception("Erreur de mise à jour " + e.getMessage());
        } finally {//effectué dans tous les cas 
            try {
                cstmt.close();
            } catch (Exception e) {
            }
        }
    }

    public void delete() throws Exception {

        CallableStatement cstmt = null;
        try {
            String req = "call deluser(?)";
            cstmt = dbConnect.prepareCall(req);
            cstmt.setInt(1, iduser);
            cstmt.executeUpdate();

        } catch (Exception e) {

            throw new Exception("Erreur d'effacement " + e.getMessage());
        } finally {//effectué dans tous les cas 
            try {
                cstmt.close();
            } catch (Exception e) {
            }
        }
    }

}
