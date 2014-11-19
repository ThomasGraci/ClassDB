
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
        super(0,nom, prenom, login, motdepasse, admin);
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
            String req = "call create_user(?,?,?,?,?)";
            cstmt = dbConnect.prepareCall(req);
            
            cstmt.setString(1, nom);
            cstmt.setString(2, prenom);
            cstmt.setString(3, login);
            cstmt.setString(4, motdepasse);
            cstmt.setInt(5, admin);
            cstmt.executeUpdate();

        } catch (SQLException e) {

            throw new Exception("Erreur de création " + e.getMessage());
        } finally {//effectué dans tous les cas 
            try {
                cstmt.close();
            } catch (Exception e) {
            }
        }
    }

    public void read(int nuser)throws Exception{
       
        CallableStatement cstmt=null;
        try{
            boolean trouve=false;
             String query1="SELECT * FROM users WHERE id_user = ?";
             PreparedStatement pstm1 = dbConnect.prepareStatement(query1);
             pstm1.setInt(1,nuser);
             ResultSet rs= pstm1.executeQuery();
             if(rs.next()){
                 trouve = true;
                 iduser = rs.getInt("ID_USER");
                 nom = rs.getString("NOM");
                 prenom = rs.getString("PRENOM");
                 login = rs.getString("LOGIN");
                 motdepasse = rs.getString("MOT_DE_PASSE");
                 admin = rs.getInt("ADMIN");
                 
             }
             if(!trouve)throw new Exception("ID_TACHE inconnu dans la table !");
        }
	catch(Exception e){
             
                throw new Exception("Erreur de lecture "+e.getMessage());
             }
        finally{//effectué dans tous les cas 
            try{
              cstmt.close();
            }
            catch (Exception e){}
        }
     }

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
