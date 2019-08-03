<?php

namespace app\controllers;

use Yii;
use app\models\Tamu;
use app\models\TamuSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UploadForm;
use yii\web\UploadedFile;
use yii\helpers\ArrayHelper;
use app\models\Kantor;
use app\models\Keterangan;


/**
 * TamuController implements the CRUD actions for Tamu model.
 */
class TamuController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Tamu models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TamuSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tamu model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Tamu model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tamu();

        if ($model->load(Yii::$app->request->post()) && $model->save()){
            
            $model->foto = UploadedFile::getInstance($model, 'foto');
            //cek apakah ada file upload dan valid
            if ($model->validate()&& !empty($model->foto)){
                $nama = $model->foto->BaseName.'.'.$model->foto->extension;
                $model->save();//simpan all data
                $model->foto->saveAs('gambar/'.$nama);
            }else {
                $model->save();// menyimpan data biasa tanpa file foto
            }
            return $this->redirect(['view', 'id' => $model->id_tamu]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Tamu model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //hapus foto lama terlbih dahulu
        if (!empty($model->foto)){
            unlink('gambar/'.$model->foto);
            }
        // proses awal upload
        $model->foto = UploadedFile::getInstance($model, 'foto');
        //cek apakah ada file upload dan valid
      if ($model->validate()&& !empty($model->foto)){
         $nama = $model->foto->BaseName.'.'.$model->foto->extension;
         $model->save();//simpan all data
        $model->foto->saveAs('gambar/'.$nama);
            }else {
        $model->save();// menyimpan data biasa tanpa file foto
            }
                  // proses akhir upload
            return $this->redirect(['view', 'id' => $model->id_tamu]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Tamu model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }



    public function actionExport(){
        $no = 1;
        $model = Tamu::find()->All();
        $filename = 'Data-'.Date('YmdGis').'-Tamu.xls';
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=".$filename);
        echo '<table border="1" width="100%">
            <thead>
               Data Tamu Kejaksaan Negeri Minahasa
               
                <tr>
                    <th>No</th>
                    <th>Nama Tamu</th>
                    <th>No Identitas</th>
                    <th>Jenis Kelamin </th>
                    <th>Kantor </th>
                    <th>Alamat Kantor </th>
                    <th>Waktu dan Tanggal</th>
                    <th>Keperluan</th>
                    <th>Keterangan</th>
                    
                </tr>
                
            </thead>';
            foreach($model as $data){
                $kantor = Kantor::find()->where(['id_kantor' => $data->id_kantor])->one();
                $ket = Keterangan::find()->where(['id_keterangan' => $data->id_keterangan])->one();
                echo '
                    <tr>
                        <td>'.$no.'</td>
                        <td>'.$data->nama_tamu.'</td>
                        <td>'.$data->nik_tamu.'</td>
                        <td>'.$data->gender_tamu.'</td>
                        <td>'.$kantor->nama_kantor.'</td>
                        <td>'.$kantor->alamat_kantor.'</td>
                        <td>'.$data->tanggal_input.'</td>
                        <td>'.$data->keperluan_tamu.'</td>
                        <td>'.$ket->nama_keterangan.'</td>
                  
                    </tr>
                ';
                $no++;
            }
        echo '</table>';
    
    }
    /**
     * Finds the Tamu model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tamu the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tamu::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
