
package classdb;

import java.sql.*;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.util.*;
import java.sql.Date;

public class TacheDB extends Tache implements CRUD{
    protected static Connection dbConnect = null;

    public TacheDB() {
    }

    public TacheDB(String titre, String description, String etat,
            Date date_tache, int num_ordre, int depanneur, int createur) {
        super(0, titre, description, etat, date_tache, num_ordre, depanneur, createur);
    }

    public TacheDB(int idtache, String titre, String description, String etat,
            Date date_tache, int num_ordre, int depanneur, int createur) {
        super(0, titre, description, etat, date_tache, num_ordre, depanneur, createur);
    }

    public TacheDB(String titre) {
        this.titre = titre;
    }

    public TacheDB(int idtache) {
        super(idtache, "", "", "", null, 0,0,0);
    }

    public static void setConnection(Connection nouvdbConnect) {
        dbConnect = nouvdbConnect;
    }

    public void create() throws Exception {
        CallableStatement cstmt = null;
        try {
            String req = "call create_tache(?,?,?,?,?,?,?,?)";
            cstmt = dbConnect.prepareCall(req);
            cstmt.registerOutParameter(1, java.sql.Types.INTEGER);
            cstmt.setString(2, titre);
            cstmt.setString(3, description);
            cstmt.setString(4, etat);
            cstmt.setDate(5, date_tache);
            cstmt.setInt(6, num_ordre);
            cstmt.setInt(7, depanneur);
            cstmt.setInt(8, createur);
            cstmt.executeUpdate();
            this.idtache = cstmt.getInt(1);

        } catch (SQLException e) {

            throw new Exception("Erreur de création " + e.getMessage());
        } finally {//effectué dans tous les cas 
            try {
                cstmt.close();
            } catch (Exception e) {
            }
        }
    }

    public void read(int ntache)throws Exception{
       
        CallableStatement cstmt=null;
        try{
            boolean trouve=false;
             String query1="SELECT * FROM tache WHERE id_tache = ?";
             PreparedStatement pstm1 = dbConnect.prepareStatement(query1);
             pstm1.setInt(1,ntache);
             ResultSet rs= pstm1.executeQuery();
             if(rs.next()){
                 trouve = true;
                 idtache = rs.getInt("ID_TACHE");
                 titre = rs.getString("TITRE");
                 description = rs.getString("DESCRIPTION");
                 etat = rs.getString("ETAT");
                 date_tache = rs.getDate("DATE_TACHE");
                 num_ordre = rs.getInt("NUM_ORDRE");
                 depanneur = rs.getInt("DEPANNEUR");
                 createur = rs.getInt("CREATEUR");
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
            String req = "call update_tache(?,?,?,?,?,?,?,?)";
            cstmt = dbConnect.prepareCall(req);
            PreparedStatement pstm = dbConnect.prepareStatement(req);
            cstmt.setInt(1, idtache);
            cstmt.setString(2, titre);
            cstmt.setString(3, description);
            cstmt.setString(4, etat);
            cstmt.setDate(5, date_tache);
            cstmt.setInt(6, num_ordre);
            cstmt.setInt(7, depanneur);
            cstmt.setInt(8, createur);
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
            String req = "call deltache(?)";
            cstmt = dbConnect.prepareCall(req);
            cstmt.setInt(1, idtache);
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
